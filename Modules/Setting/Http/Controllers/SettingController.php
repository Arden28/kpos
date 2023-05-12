<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Company;
use App\Models\Team;
use App\Traits\CompanySession;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Modules\Currency\Interfaces\CurrencyInterface;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\StoreSettingsRequest;
use Modules\Setting\Http\Requests\StoreSmtpSettingsRequest;
use Modules\User\DataTables\UsersDataTable;

class SettingController extends Controller
{
    use CompanySession;
    protected $currencyRepository;

    public function __construct(CurrencyInterface $currencyRepository){

        $this->currencyRepository = $currencyRepository;
    }

    public function index() {
        abort_if(Gate::denies('access_settings'), 403);

        $company = Auth::user()->currentCompany->id;
        // Currencies
        $currencies = $this->currencyRepository->getCurrencies($company);
        $settings = Setting::where('company_id', $company)->first();

        // $team = Team::find(Auth::user()->team->id)->first();
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();


        return view('setting::index', compact('settings', 'currencies', 'team'));
    }


    public function update(StoreSettingsRequest $request, Setting $setting) {
        $company = Company::find(Auth::user()->currentCompany->id);

        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->phone = $request->company_phone;
        $company->address = $request->company_address;
        $company->save();
        // $company->update([
        //     'name' => $request->company_name,
        //     'email' => $request->company_email,
        //     'phone' => $request->company_phone,
        //     'address' => $request->company_address,
        // ]);

        $setting->update([
            'notification_email' => $request->notification_email,
            'default_currency_id' => $request->default_currency_id,
            'default_currency_position' => $request->default_currency_position,
            // 'footer_text' => $request->footer_text
        ]);

        cache()->forget('settings');

        toast('Modifications sauvegardées !', 'info');

        return redirect()->route('settings.index');
    }


    public function updateSmtp(StoreSmtpSettingsRequest $request) {
        $toReplace = array(
            'MAIL_MAILER='.env('MAIL_HOST'),
            'MAIL_HOST="'.env('MAIL_HOST').'"',
            'MAIL_PORT='.env('MAIL_PORT'),
            'MAIL_FROM_ADDRESS="'.env('MAIL_FROM_ADDRESS').'"',
            'MAIL_FROM_NAME="'.env('MAIL_FROM_NAME').'"',
            'MAIL_USERNAME="'.env('MAIL_USERNAME').'"',
            'MAIL_PASSWORD="'.env('MAIL_PASSWORD').'"',
            'MAIL_ENCRYPTION="'.env('MAIL_ENCRYPTION').'"'
        );

        $replaceWith = array(
            'MAIL_MAILER='.$request->mail_mailer,
            'MAIL_HOST="'.$request->mail_host.'"',
            'MAIL_PORT='.$request->mail_port,
            'MAIL_FROM_ADDRESS="'.$request->mail_from_address.'"',
            'MAIL_FROM_NAME="'.$request->mail_from_name.'"',
            'MAIL_USERNAME="'.$request->mail_username.'"',
            'MAIL_PASSWORD="'.$request->mail_password.'"',
            'MAIL_ENCRYPTION="'.$request->mail_encryption.'"');

        try {
            file_put_contents(base_path('.env'), str_replace($toReplace, $replaceWith, file_get_contents(base_path('.env'))));
            Artisan::call('cache:clear');

            toast('Mail Settings Updated!', 'info');
        } catch (\Exception $exception) {
            Log::error($exception);
            session()->flash('settings_smtp_message', 'Something Went Wrong!');
        }

        return redirect()->route('settings.index');
    }

    // Users

    public function users(UsersDataTable $dataTable) {
        abort_if(Gate::denies('access_user_management'), 403);

        return $dataTable->render('setting::users.index');
    }
}
