<?php declare(strict_types=1);

namespace Shopware\Tests\Bench\Cases;

use PhpBench\Attributes as Bench;
use Shopware\Core\Content\Category\SalesChannel\NavigationRoute;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Tests\Bench\BenchCase;
use Symfony\Component\HttpFoundation\Request;

class CategoryBench extends BenchCase
{
    #[Bench\Assert('mode(variant.time.avg) < 10ms')]
    public function bench_load_navigation(): void
    {
        $route = $this->getContainer()->get(NavigationRoute::class);

        $route->load(
            $this->ids->get('navigation'),
            $this->ids->get('navigation'),
            new Request(),
            $this->context,
            new Criteria()
        );
    }
}
