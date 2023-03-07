@extends('layouts.master')

@section('breadcrumb')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Our Prices') }}
                </h2>
            </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-vcenter table-bordered table-nowrap card-table">
                <thead>
                  <tr>
                    <td class="w-50">
                      <h2>Pricing plans for teams of all sizes</h2>
                      <div class="text-muted text-wrap">
                        Choose an affordable plan that comes with the best features to engage your audience, create customer loyalty and increase sales.
                      </div>
                    </td>
                    @foreach ($plans as $plan)
                        <td class="text-center">
                            <div class="text-uppercase text-muted fw-bold">{{ $plan->name }}</div>
                            <div class="display-6 fw-bold my-3">{{ $plan->price }} {{ $plan->currency }} <sub>/user/month</sub></div>
                            <a href="#" class="btn w-100">{{ __('Choose plan') }}</a>
                        </td>
                    @endforeach
                    @php
                        $user = \App\Models\User::find(auth()->user()->id);
                        $features = $plan->features;
                    @endphp
                  </tr>
                </thead>
                <tbody>
                @foreach ($features as $feature)
                    <tr class="bg-light">
                    <th colspan="4" class="subheader">Support</th>
                    </tr>
                    <tr>
                    <td>{{ $feature->name }}</td>
                    @foreach ($plans as $plan)
                        <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        </td>
                    @endforeach
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    @foreach ($plans as $plan)
                        <td>
                        <a href="#" class="btn w-100 {{ $plan->id == 2 ? 'btn-green' : '' }}">{{ $user->isSubscribedTo($plan->id) == true ? 'Subscribed' :  'Choose Plan'}}</a>
                        </td>
                    @endforeach
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection
