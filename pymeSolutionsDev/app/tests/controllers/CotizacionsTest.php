<?php

use Mockery as m;
use Way\Tests\Factory;

class CotizacionsTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'Cotizacion');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::Cotizacion(['id' => 1]);
		$this->app->instance('Cotizacion', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'Cotizacions');

		$this->assertViewHas('Cotizacions');
	}

	public function testCreate()
	{
		$this->call('GET', 'Cotizacions/create');

		$this->assertResponseOk();
	}
        
        public function testParametrizar()
	{
		$this->call('GET', 'Cotizacions/parametrizar');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'Cotizacions');

		$this->assertRedirectedToRoute('Cotizacions.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'Cotizacions');

		$this->assertRedirectedToRoute('Cotizacions.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'Cotizacions/1');

		$this->assertViewHas('Cotizacion');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'Cotizacions/1/edit');

		$this->assertViewHas('Cotizacion');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'Cotizacions/1');

		$this->assertRedirectedTo('Cotizacions/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'Cotizacions/1');

		$this->assertRedirectedTo('Cotizacions/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'Cotizacions/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
