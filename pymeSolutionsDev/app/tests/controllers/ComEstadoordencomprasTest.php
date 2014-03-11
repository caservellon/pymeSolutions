<?php

use Mockery as m;
use Way\Tests\Factory;

class ComEstadoordencomprasTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'COM_EstadoOrdenCompra');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::COM_EstadoOrdenCompra(['id' => 1]);
		$this->app->instance('COM_EstadoOrdenCompra', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'COM_EstadoOrdenCompras');

		$this->assertViewHas('COM_EstadoOrdenCompras');
	}

	public function testCreate()
	{
		$this->call('GET', 'COM_EstadoOrdenCompras/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'COM_EstadoOrdenCompras');

		$this->assertRedirectedToRoute('COM_EstadoOrdenCompras.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'COM_EstadoOrdenCompras');

		$this->assertRedirectedToRoute('COM_EstadoOrdenCompras.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'COM_EstadoOrdenCompras/1');

		$this->assertViewHas('COM_EstadoOrdenCompra');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'COM_EstadoOrdenCompras/1/edit');

		$this->assertViewHas('COM_EstadoOrdenCompra');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'COM_EstadoOrdenCompras/1');

		$this->assertRedirectedTo('COM_EstadoOrdenCompras/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'COM_EstadoOrdenCompras/1');

		$this->assertRedirectedTo('COM_EstadoOrdenCompras/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'COM_EstadoOrdenCompras/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
