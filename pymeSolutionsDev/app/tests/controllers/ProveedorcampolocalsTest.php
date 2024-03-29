<?php

use Mockery as m;
use Way\Tests\Factory;

class ProveedorcampolocalsTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'ProveedorCampoLocal');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::ProveedorCampoLocal(['id' => 1]);
		$this->app->instance('ProveedorCampoLocal', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'ProveedorCampoLocals');

		$this->assertViewHas('ProveedorCampoLocals');
	}

	public function testCreate()
	{
		$this->call('GET', 'ProveedorCampoLocals/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'ProveedorCampoLocals');

		$this->assertRedirectedToRoute('ProveedorCampoLocals.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'ProveedorCampoLocals');

		$this->assertRedirectedToRoute('ProveedorCampoLocals.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'ProveedorCampoLocals/1');

		$this->assertViewHas('ProveedorCampoLocal');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'ProveedorCampoLocals/1/edit');

		$this->assertViewHas('ProveedorCampoLocal');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'ProveedorCampoLocals/1');

		$this->assertRedirectedTo('ProveedorCampoLocals/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'ProveedorCampoLocals/1');

		$this->assertRedirectedTo('ProveedorCampoLocals/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'ProveedorCampoLocals/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
