<?php
require_once "config/bootstrap.php";
use Doctrine\Common\EventManager;

$e = new EventManager();
if (false) {
    class TestEvent
    {
        const preFoo = 'preFoo';
        const postFoo = 'postFoo';

        private $_evm;

        public $preFooInvoked = false;
        public $postFooInvoked = false;

        public function __construct($evm)
        {
            $evm->addEventListener(array(self::preFoo, self::postFoo), $this);
            $this->_evm = $evm;
        }

        public function preFoo($e)
        {
            echo "pre";
            $this->preFooInvoked = true;
        }

        public function postFoo($e)
        {
            echo "post";
            $this->postFooInvoked = true;
            //$this->_evm->removeEventListener(array(self::preFoo, self::postFoo), $this);
        }
    }

    // Create a new instance
    $test = new TestEvent($e);

    $e->dispatchEvent(TestEvent::preFoo);
    $e->dispatchEvent(TestEvent::postFoo);
    $e->dispatchEvent(TestEvent::preFoo);
}

class TestEvent
{
    const preFoo = 'preFoo';
    const postFoo = 'postFoo';

    private $_evm;

    public $preFooInvoked = false;
    public $postFooInvoked = false;

    public function __construct($evm)
    {
        $evm->addEventListener(array(self::preFoo, self::postFoo), $this);
        $this->_evm = $evm;
    }

    public function preFoo($e)
    {
        echo "pre";
        $this->preFooInvoked = true;
    }

    public function postFoo($e)
    {
        echo "post";
        $this->postFooInvoked = true;
        $this->_evm->removeEventListener(array(self::preFoo, self::postFoo), $this);
    }
}

class TestEventSubscriber implements \Doctrine\Common\EventSubscriber
{
    public $preFooInvoked = false;

    public function preFoo()
    {
        echo "subscriber";
        $this->preFooInvoked = true;
    }

    public function getSubscribedEvents()
    {
        return array(TestEvent::preFoo);
    }
}

$eventSubscriber = new TestEventSubscriber();
$e->addEventSubscriber($eventSubscriber);

$e->dispatchEvent(TestEvent::preFoo);

if ($eventSubscriber->preFooInvoked) {
    echo 'pre foo invoked!';
}

