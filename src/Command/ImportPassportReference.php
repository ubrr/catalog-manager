<?php


namespace App\Command;


use App\Repository\PassportRecordRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use UBRR\RefPoint\Core\Record;
use UBRR\RefPoint\PassportReference\PassportRecord;
use UBRR\RefPoint\PassportReference\PassportReference;
use Doctrine\Common\Persistence\ManagerRegistry;

class ImportPassportReference extends Command
{
    protected static $defaultName = "reference:passport-import";
    private $reference;

    public function __construct(ManagerRegistry $registy)
    {
        parent::__construct();
        $this->reference = new PassportReference(new PassportRecordRepository($registy));
    }

    protected function configure()
    {
        $this->setDescription("Импортирует список не используемых паспартов.")
            ->addArgument("file", InputArgument::REQUIRED, "Файл, который предстоит импортировать");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileName = $input->getArgument("file");
        if(!file_exists($fileName)) {
            $output->writeln("Файл '$fileName' не найден");
            return -1;
        }
        $handle = fopen($fileName, 'r');
        fgetcsv($handle);//пропускаем заголовок
        while (($line = fgetcsv($handle)) != false) {
            $this->reference->add(new Record(new PassportRecord($line[0], $line[1])));
        }
        return 0;
    }
}