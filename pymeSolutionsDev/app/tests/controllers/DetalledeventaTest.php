<?php

use Mockery as m;
use Way\Tests\Factory;

class DetalledeventaTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'DetalleDeVentum');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::DetalleDeVentum(['id' => 1]);
		$this->app->instance('DetalleDeVentum', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'DetalleDeVenta');

		$this->assertViewHas('DetalleDeVenta');
	}

	public function testCreate()
	{
		$this->call('GET', 'DetalleDeVenta/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'DetalleDeVenta');

		$this->assertRedirectedToRoute('DetalleDeVenta.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'DetalleDeVenta');

		$this->assertRedirectedToRoute('DetalleDeVenta.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'DetalleDeVenta/1');

		$this->assertViewHas('DetalleDeVentum');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'DetalleDeVenta/1/edit');

		$this->assertViewHas('DetalleDeVentum');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'DetalleDeVenta/1');

		$this->assertRedirectedTo('DetalleDeVenta/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'DetalleDeVenta/1');

		$this->assertRedirectedTo('DetalleDeVenta/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'DetalleDeVenta/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
