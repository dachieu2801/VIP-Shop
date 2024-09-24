<?php


namespace Beike\Admin\Repositories;

use Beike\Models\TaxRate;

class TaxRateRepo
{
    public static function getList()
    {
        return TaxRate::query()->with([
            'region',
        ])->get();
    }

    public static function createOrUpdate($data)
    {
        $id = $data['id'] ?? 0;
        if ($id) {
            $taxRate = TaxRate::query()->findOrFail($id);
        } else {
            $taxRate = new TaxRate;
        }
        $taxRate->fill([
            'region_id' => $data['region_id'],
            'name'      => $data['name'],
            'rate'      => $data['rate'],
            'type'      => $data['type'],
        ]);
        $taxRate->saveOrFail();

        return $taxRate;
    }

    public static function deleteById($id)
    {
        $taxRate = TaxRate::query()->findOrFail($id);
        $taxRate->delete();
    }

    public static function getNameByRateId($taxRateId)
    {
        $taxRate = TaxRate::query()->findOrFail($taxRateId);

        return $taxRate->name;
    }
}
