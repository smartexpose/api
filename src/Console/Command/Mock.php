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
    protected $description = 'Mock data from Blueprint @Response annotations in Controllers';

    /**
     * Create a new mock command instance.
     *
     * @param \Dingo\Blueprint\Blueprint $blueprint
     * @param \Dingo\Blueprint\Writer    $writer
     * @param string                     $name
     * @param string                     $version
     *
     * @return void
     */
    public function __construct(DataMocker $mocker, Writer $writer, $name, $version)
    {
        parent::__construct();

        $this->mocker = $mocker;
        $this->writer = $writer;
        $this->name = $name;
        $this->version = $version;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $controllerName = $this->argument(controller);
        $contents = $this->mocker->generate($controllerName);
        $file = $this->getOutputFileName($controllerName);
        $this->writer->write($contents, $file);
        return $this->info('Mock data was generated successfully.');
    }

    /**
     * Get the include path for documentation files.
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
