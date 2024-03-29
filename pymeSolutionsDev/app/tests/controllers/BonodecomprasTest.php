<?php

use Mockery as m;
use Way\Tests\Factory;

class BonodecomprasTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'BonoDeCompra');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::BonoDeCompra(['id' => 1]);
		$this->app->instance('BonoDeCompra', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'BonoDeCompras');

		$this->assertViewHas('BonoDeCompras');
	}

	public function testCreate()
	{
		$this->call('GET', 'BonoDeCompras/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'BonoDeCompras');

		$this->assertRedirectedToRoute('BonoDeCompras.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'BonoDeCompras');

		$this->assertRedirectedToRoute('BonoDeCompras.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'BonoDeCompras/1');

		$this->assertViewHas('BonoDeCompra');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'BonoDeCompras/1/edit');

		$this->assertViewHas('BonoDeCompra');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'BonoDeCompras/1');

		$this->assertRedirectedTo('BonoDeCompras/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'BonoDeCompras/1');

		$this->assertRedirectedTo('BonoDeCompras/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'BonoDeCompras/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
