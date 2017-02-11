<?php

namespace graphan\Magento2GraphQL\Model\Product\Type;

use Youshido\GraphQL\Type\Object\AbstractObjectType;

/**
 * @codeCoverageIgnore
 */
class ProductType extends AbstractObjectType
{
    use ProductTypeTrait;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(
//        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        array $config = []
    )
    {
        parent::__construct($config);

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $this->productRepository = $objectManager->create('Magento\Catalog\Api\ProductRepositoryInterface');
    }

    public function build($config)
    {
        $this->getProductFields($config);
    }

    public function getOne($id)
    {
        return $this->productRepository->getById($id);
    }
}