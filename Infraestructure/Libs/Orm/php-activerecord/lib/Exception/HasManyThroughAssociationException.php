<?php

namespace ActiveRecord\Exception;
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Libs/Orm/php-activerecord/lib/Exception/RelationshipException.php";
/**
 * Thrown for has many thru exceptions.
 *
 * @package ActiveRecord
 */
class HasManyThroughAssociationException extends RelationshipException
{
}
