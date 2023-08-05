<?php

namespace App\Listeners\Pos;

use App\Events\Pos\PrintPdfEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Queue\InteractsWithQueue;

class PrintPdfListener
{
    protected $urlGenerator;

    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(PrintPdfEvent $event)
    {
        // $pdfUrl = $event->pdfUrl;

        // // Ouvrir une nouvelle fenêtre avec le PDF
        // $win = window.open($pdfUrl, '_blank');
        // $win.focus();

        // // Attendre un court instant pour que le PDF soit chargé
        // setTimeout(function () {
        //     // Lancer l'impression du PDF
        //     $win.print();
        // }, 1000);
    }
}
