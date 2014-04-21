<?php

use Mockery as m;
use Way\Tests\Factory;

class FormapagoventaTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'FormaPagoVentum');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::FormaPagoVentum(['id' => 1]);
		$this->app->instance('FormaPagoVentum', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'FormaPagoVenta');

		$this->assertViewHas('FormaPagoVenta');
	}

	public function testCreate()
	{
		$this->call('GET', 'FormaPagoVenta/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'FormaPagoVenta');

		$this->assertRedirectedToRoute('FormaPagoVenta.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'FormaPagoVenta');

		$this->assertRedirectedToRoute('FormaPagoVenta.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'FormaPagoVenta/1');

		$this->assertViewHas('FormaPagoVentum');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'FormaPagoVenta/1/edit');

		$this->assertViewHas('FormaPagoVentum');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'FormaPagoVenta/1');

		$this->assertRedirectedTo('FormaPagoVenta/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'FormaPagoVenta/1');

		$this->assertRedirectedTo('FormaPagoVenta/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'FormaPagoVenta/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
