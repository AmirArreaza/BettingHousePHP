<?php


/**
 * This class adds structure of 'EVENTO' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 11/05/09 19:06:57
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class EventoMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.EventoMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(EventoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EventoPeer::TABLE_NAME);
		$tMap->setPhpName('Evento');
		$tMap->setClassname('Evento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 255);

		$tMap->addColumn('FECHAINI', 'Fechaini', 'DATE', true, null);

		$tMap->addColumn('HORAINI', 'Horaini', 'TIME', true, null);

		$tMap->addColumn('RESULTADO', 'Resultado', 'VARCHAR', false, 255);

		$tMap->addForeignKey('FKCATEGORIA', 'Fkcategoria', 'INTEGER', 'CATEGORIA', 'ID', true, null);

	} // doBuild()

} // EventoMapBuilder
