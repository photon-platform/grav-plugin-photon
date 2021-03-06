<?php
namespace Grav\Plugin\Console;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;

require_once(__DIR__ . '/../classes/PhotonCommand.php');

/**
 * Class NewPluginJsCommand
 * @package Grav\Console\Cli\DevTools
 */
class NewPluginJsCommand extends PhotonCommand
{

    /**
     * @var array
     */
    protected $options = [];

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('new-plugin-js')
            ->setAliases(['newpluginjs'])
            ->addOption(
                'name',
                'pn',
                InputOption::VALUE_REQUIRED,
                'The name of your new PHOTON plugin'
            )
            ->addOption(
                'description',
                'd',
                InputOption::VALUE_OPTIONAL,
                'A description of your new PHOTON plugin'
            )
            ->addOption(
                'developer',
                'dv',
                InputOption::VALUE_OPTIONAL,
                'The name/username of the developer',
                'phi ARCHITECT'
            )
            ->addOption(
                'githubid',
                'gh',
                InputOption::VALUE_OPTIONAL,
                'The developer\'s GitHub ID',
                'phiarchitect'
            )
            ->addOption(
                'email',
                'e',
                InputOption::VALUE_OPTIONAL,
                'The developer\'s email',
                'phi@photon-platform.net'
            )
            ->setDescription('Creates a new Grav plugin with the basic required files')
            ->setHelp('The <info>new-plugin</info> command creates a new Grav instance and performs the creation of a plugin.');
    }

    /**
     * @return int|null|void
     */
    protected function serve()
    {
        $this->init();

        /**
         * @var array PhotonCommand $component
         */
        $this->component['type']        = 'plugin';
        $this->component['template']    = 'datatype';
        $this->component['version']     = '0.1.0';

        $this->options = [
            'name'          => $this->input->getOption('name'),
            'description'   => $this->input->getOption('description'),
            'author'        => [
                'name'      => $this->input->getOption('developer'),
                'email'     => $this->input->getOption('email'),
                'githubid'  => $this->input->getOption('githubid')
            ]
        ];

        $this->validateOptions();

        $this->component = array_replace($this->component, $this->options);

        $helper = $this->getHelper('question');

        $this->output->writeln("\n<yellow>photon ✴ </yellow><white>plugin generator</white>\n");

        if (!$this->options['name']) {
            $question = new Question('enter plugin <yellow>NAME</yellow>: ');
            $question->setValidator(function ($value) {
                return $this->validate('name',  $value);
            });

            $this->component['name'] = $helper->ask($this->input, $this->output, $question);
        }

        if (!$this->options['description']) {
            $question = new Question('enter plugin <yellow>DESC</yellow>: ' );
            $question->setValidator(function ($value) {
                return $this->validate('description', $value);
            });

            $this->component['description'] = $helper->ask($this->input, $this->output, $question);
        }

        if (!$this->options['author']['name']) {
            $question = new Question('Enter <yellow>Developer Name</yellow>: ');
            $question->setValidator(function ($value) {
                return $this->validate('developer', $value);
            });

            $this->component['author']['name'] = $helper->ask($this->input, $this->output, $question);
        }


        if (!$this->options['author']['githubid']) {
            $question = new Question('Enter <yellow>GitHub ID</yellow> (can be blank): ');
            $question->setValidator(function ($value) {
                return $this->validate('githubid', $value);
            });

            $this->component['author']['githubid'] = $helper->ask($this->input, $this->output, $question);
        }

        if (!$this->options['author']['email']) {
            $question = new Question('Enter <yellow>Developer Email</yellow>: ');
            $question->setValidator(function ($value) {
                return $this->validate('email', $value);
            });

            $this->component['author']['email'] = $helper->ask($this->input, $this->output, $question);
        }

        $this->component['template'] = 'datatype';

        if ( ($this->component['author']['githubid'] === null) || (trim($this->component['author']['githubid']) === '') ) {
            $this->component['author']['githubid'] = $this->component['author']['name'];
        }

        $this->createComponent();
    }

}
