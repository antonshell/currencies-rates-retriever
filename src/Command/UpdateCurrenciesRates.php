<?php

declare(strict_types=1);

namespace App\Command;

use App\Currency\CurrencyEnum;
use App\Currency\CurrencyFactory;
use App\Currency\CurrencyService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class UpdateCurrenciesRates.
 */
class UpdateCurrenciesRates extends Command
{
    /**
     * @var CurrencyFactory
     */
    private $currencyFactory;

    /**
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * @var string
     */
    private $rootPath;

    /**
     * UpdateCurrenciesRates constructor.
     *
     * @param CurrencyFactory $currencyFactory
     * @param CurrencyService $currencyService
     * @param string $rootPath
     */
    public function __construct(
        CurrencyFactory $currencyFactory,
        CurrencyService $currencyService,
        string $rootPath
    ) {
        $this->currencyFactory = $currencyFactory;
        $this->currencyService = $currencyService;
        $this->rootPath = $rootPath;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('currencies:update-all-rates')
            ->setDescription('Update all currencies rates');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     *
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currencies = CurrencyEnum::getValues();

        foreach ($currencies as $currency) {
            $output->writeln('Processing currency: '.$currency);
            $retriever = $this->currencyFactory->createRetriever($currency);
            $mapper = $this->currencyFactory->createMapper($currency);

            $data = $retriever->retrieve();
            $data = $mapper->map($data);
            $data = $this->currencyService->addMissingDates($data);

            $json = json_encode($data);

            $path = $this->rootPath . '/currencies_data/' . strtolower($currency) . '_usd.json';
            file_put_contents($path, $json);
        }

        $output->writeln('Job is done');
    }
}
