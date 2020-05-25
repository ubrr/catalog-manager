<?php


namespace App\Repository;


use App\Entity\PassportRecord;
use UBRR\RefPoint\PassportReference\PassportRecord as PassportModel;

class PassportRecordMapper
{
    public function toModel(PassportRecord $record): PassportModel
    {
        return (new PassportModel($record->getSeries(), $record->getNumber(), $record->getId()));

    }

    public function toRecord(PassportModel $model): PassportRecord
    {
        return (new PassportRecord())->setNumber($model->getNumber())
            ->setSeries($model->getSeries())
            ->setId($model->getId());
    }
}