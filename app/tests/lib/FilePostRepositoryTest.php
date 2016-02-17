<?php

use Flaviozantut\Storage\Posts\FilePostRepository as PostRepository;

class FilePostRepositoryTest extends TestCase
{
    public function testStore()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->store([
            'post'         => 'Hello from Skorry post',
            'type'         => 'article',
            'title'        => 'Hello Skorry',
            'date'         => '',
            'comments'     => true,
            'external_url' => false,
            'categories'   => [''],
        ]);
        $this->assertStringMatchesFormat('%s', $post);
    }

    /**
     * @expectedException Exception
     */
    public function testStoreTitleException()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->store([
            'post'         => 'Hello from Skorry post',
            'type'         => 'article',
            'date'         => '',
            'comments'     => true,
            'external_url' => false,
            'categories'   => [''],
        ]);
        $this->assertTrue($post);
    }

    /**
     * @expectedException Exception
     */
    public function testStoreException()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->store([
            'post'         => 'Hello from Skorry post',
            'type'         => 'article',
            'title'        => 'Hello Skorry',
            'date'         => '',
            'comments'     => true,
            'external_url' => false,
            'categories'   => [''],
        ]);
        $this->assertTrue($post);
    }

    public function testGetAll()
    {
        $repository = new PostRepository($this->getFixture(''));
        $posts = $repository->all();
        $this->assertEquals('hello-skorry.md', $posts[0]->id);
    }

    public function testFind()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->find('hello-skorry.md');
        $this->assertEquals('hello-skorry.md', $post->id);
    }

    public function testFindNotExist()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->find('foo');
        $this->assertNull($post);
    }

    public function testUpdate()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->update('hello-skorry.md', [
            'post'         => 'Hello from Skorry post',
            'type'         => 'article',
            'title'        => 'Hello Skorry',
            'date'         => '',
            'comments'     => true,
            'external_url' => false,
            'categories'   => [''],
        ]);
        $this->assertTrue($post);
    }

    /**
     * @expectedException Exception
     */
    public function testUpdateNotExist()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->update('not-exist-file.md', [

        ]);
    }

    public function testDestroy()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->destroy('hello-skorry.md');
        $this->assertTrue($post);
    }

    /**
     * @expectedException Exception
     */
    public function testDestroyNotExist()
    {
        $repository = new PostRepository($this->getFixture(''));
        $post = $repository->destroy('not-exist-file.md');
    }
}
