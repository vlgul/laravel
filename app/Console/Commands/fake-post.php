<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class fake-post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake-post:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia una entrada falsa';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $url = "https://atomic.incfile.com/fakepost";
        $request = $client->post($url, ['form_parameters'=>[
		'title'=>"Pruebas para Vacante PHP Laravel",
		'name'=>"Virgilio Santiago Benítez",
		'greetings'=>"Saludos desde Acapulco",
	]);
	$ResponseStatus=$request->getStatusCode();
	$ResponseContent =$request->getBody()->getContents();
	$this->info('La entrada fue enviada exitosamente a'.$url);
	$this->info('El estado de este requerimiento de POST fue'.$ResponseStatus);
     	$this->info('El contenido requerimiento del POST es'.$ResponseContent);
    }
}
