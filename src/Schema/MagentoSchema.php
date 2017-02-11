<?php

namespace graphan\Magento2GraphQL\Schema;

use graphan\Magento2GraphQL\Model\Product\Type\ProductType;
use Magento\Config\Model\Config\Backend\Admin\Custom;
use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * @codeCoverageIgnore
 */
class MagentoSchema extends AbstractSchema
{
    // Category Fields
    private $addCategoryField;
    private $categoriesField;
    private $categoryField;
    private $deleteCategoryField;
    private $moveCategoryField;
    private $updateCategoryField;

    // Category Attribute Fields
    private $categoryAttributeField;
    private $categoryAttributesField;

    //Modules Field
    private $modulesField;

    // Product Attribute Fields
    private $addProductAttributeField;
    private $deleteProductAttributeField;
    private $productAttributeField;
    private $productAttributesField;

    // Product Fields
    private $addProductField;
    private $deleteProductField;
    private $productField;
    private $productsField;
    private $updateProductField;

    private $logger;

    public function __construct(
                        AbstractField $addCategoryField,
                        AbstractField $addProductAttributeField,
                        AbstractField $addProductField,
                        AbstractField $categoriesField,
                        AbstractField $categoryAttributeField,
                        AbstractField $categoryAttributesField,
                        AbstractField $categoryField,
                        AbstractField $deleteCategoryField,
                        AbstractField $deleteProductAttributeField,
                        AbstractField $deleteProductField,
                        AbstractField $modulesField,
                        AbstractField $moveCategoryField,
                        AbstractField $productAttributeField,
                        AbstractField $productAttributesField,
                        AbstractField $productField,
                        AbstractField $productsField,
                        AbstractField $updateCategoryField,
                        AbstractField $updateProductField
    )
    {
        // Category
        $this->addCategoryField = $addCategoryField;
        $this->categoriesField = $categoriesField;
        $this->categoryField = $categoryField;
        $this->deleteCategoryField = $deleteCategoryField;
        $this->moveCategoryField = $moveCategoryField;
        $this->updateCategoryField = $updateCategoryField;
    //
    //        // Category Attribute
        $this->categoryAttributeField = $categoryAttributeField;
        $this->categoryAttributesField = $categoryAttributesField;
    //
    //        // Modules
        $this->modulesField = $modulesField;

        // Product Attribute
        $this->addProductAttributeField = $addProductAttributeField;
        $this->deleteProductAttributeField = $deleteProductAttributeField;
        $this->productAttributeField = $productAttributeField;
        $this->productAttributesField = $productAttributesField;

        // Product
        $this->addProductField = $addProductField;
        $this->deleteProductField = $deleteProductField;
        $this->productField = $productField;
        $this->productsField = $productsField;
        $this->updateProductField = $updateProductField;

        parent::__construct([]);
    }

    public function build(SchemaConfig $config)
    {
        $config->getQuery()
            ->addField($this->categoriesField, 'string')
            ->addField($this->categoryField, 'string')
            ->addField($this->categoryAttributesField, 'string')
            ->addField($this->categoryAttributeField, 'string')
            ->addField($this->modulesField, 'string')
            ->addField($this->productAttributesField, 'string')
            ->addField($this->productAttributeField, 'string')
            ->addField($this->productsField, 'string')

            ->addField(
                'product' ,
                [
                    'type'    => new ProductType(),
                    'args'    => [
                        'id' => new StringType()
                    ],
                    'resolve' => function ($value, array $args, ResolveInfo $info) {
                        /** @var ProductType $productType */
                        $productType = $info->getReturnType();
                        return $productType->getOne(empty($args['id']) ? 1 : $args['id']);
                    }
                ]);

        $config->getMutation()
            ->addField($this->addCategoryField, 'string')
            ->addField($this->addProductAttributeField, 'string')
            ->addField($this->addProductField, 'string')
            ->addField($this->deleteCategoryField, 'string')
            ->addField($this->deleteProductAttributeField, 'string')
            ->addField($this->deleteProductField, 'string')
            ->addField($this->moveCategoryField, 'string')
            ->addField($this->updateCategoryField, 'string')
            ->addField($this->updateProductField, 'string');
    }
}

?>
