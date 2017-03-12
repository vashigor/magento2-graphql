<?php

namespace graphan\Magento2GraphQL\Type;

use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\CompositeTypeInterface;
use Youshido\GraphQL\Config\Traits\ConfigAwareTrait;
use Youshido\GraphQL\Validator\Exception\ConfigurationException;

/**
 * @codeCoverageIgnore
 */
class NonNullType extends AbstractType implements CompositeTypeInterface
{
    use ConfigAwareTrait;

    private $_typeOf;

    /**
     * NonNullType constructor.
     * @param AbstractType|string $fieldType
     * @throws ConfigurationException
     */
    public function __construct($fieldType)
    {
        if (!TypeService::isGraphQLType($fieldType)) {
            throw new ConfigurationException('NonNullType accepts only GraphpQL Types as argument');
        }
        if (TypeService::isScalarType($fieldType)) {
            $fieldType = TypeFactory::getScalarType($fieldType);
        }

        $this->_typeOf = $fieldType;
    }

    public function getName()
    {
        return null;
    }

    public function getKind()
    {
        return TypeMap::KIND_NON_NULL;
    }

    public function resolve($value)
    {
        return $value;
    }

    public function isValidValue($value)
    {
        return $value !== null;
    }

    public function isCompositeType()
    {
        return true;
    }

    public function getNamedType()
    {
        return $this->getTypeOf();
    }

    public function getNullableType()
    {
        return $this->getTypeOf();
    }

    public function getTypeOf()
    {
        return $this->_typeOf;
    }

    public function parseValue($value)
    {
        return $this->getNullableType()->parseValue($value);
    }
}