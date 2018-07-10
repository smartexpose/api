<?php

namespace Dingo\Api\Console\Command;

use Dingo\Blueprint\DataMocker;
use Dingo\Blueprint\Writer;
use Illuminate\Console\Command;

class Mock extends Command
{
    /**
     * The blueprint instance.
     *
     * @var \Dingo\Blueprint\DataMocker
     */
    protected $mocker;

    /**
     * Writer instance.
     *
     * @var \Dingo\Blueprint\Writer
     */
    protected $writer;

    /**
     * Controller name.
     *
     * @var string
     */
    protected $controller;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:mock {controller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mock Response data from Blueprint annotations';

    /**
     * Create a new mock command instance.
     *
     * @param \Dingo\Blueprint\DataMocker   $mocker
     * @param \Dingo\Blueprint\Writer       $writer
     * @param string                        $controller
     *
     * @return void
     */
    public function __construct(DataMocker $mocker, Writer $writer, $controller)
    {
        parent::__construct();

        $this->mocker = $mocker;
        $this->writer = $writer;
        $this->controller = $controller;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $controllerName = $this->argument('controller');
        $contents = $this->mocker->generate($controllerName);
        $file = $this->getOutputFileName($controllerName);
        $this->writer->write($contents, $file);
        $this->info('Mock data was generated successfully.');
    }

    /**
     * Get the output path for documentation files.
     *
     * @param string $controllerName Name of Controller
     * @return string
     */
    protected function getOutputFileName($controllerName)
    {
        //todo: '{SERVICE_NAME}-{ENDPOINT}-{VERSION}.json'
        return base_path(''); // $controllerName
    }

}
