<?php

namespace App\Form\DataTable\Type;

use Kreyu\Bundle\DataTableBundle\Bridge\Doctrine\Orm\Filter\Type\DateFilterType;
use Kreyu\Bundle\DataTableBundle\Bridge\Doctrine\Orm\Filter\Type\StringFilterType;
use Kreyu\Bundle\DataTableBundle\Column\Type\DateColumnType;
use Kreyu\Bundle\DataTableBundle\Column\Type\TextColumnType;
use Kreyu\Bundle\DataTableBundle\DataTableBuilderInterface;
use Kreyu\Bundle\DataTableBundle\Type\AbstractDataTableType;

class ArticleDataTableType extends AbstractDataTableType
{
    public function buildDataTable(DataTableBuilderInterface $builder, array $options): void
    {
        $builder
            ->addColumn('title', TextColumnType::class, [
                'sort' => true,
                'export' => true,
            ])
            ->addColumn('author', TextColumnType::class, [
                'sort' => 'author.fullName',
                'export' => true,
            ])
            ->addColumn('publishedAt', DateColumnType::class, [
                'sort' => true,
                'export' => true,
                'format' => 'd/m/Y'
            ]);

        $builder->addFilter('title', StringFilterType::class)
            ->addFilter('author', StringFilterType::class)
            ->addFilter('publishedAt', DateFilterType::class);
    }
}