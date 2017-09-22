<?php
use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;

class MyLocaleFilter extends SQLFilter
{
	public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
	{
		// Check if the entity implements the LocalAware interface

		return $targetTableAlias.'.name = ' . $this->getParameter('test'); // getParameter applies quoting automatically
	}
}
