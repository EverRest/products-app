<?php
declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsComponent extends Component
{
    use WithPagination;

    private const PER_PAGE = 9;

    /**
     * @var int|float
     */
    public int|float $priceFrom = 0;

    /**
     * @var int|float
     */
    public int|float $priceTo = 0;

    /**
     * @var array
     */
    public array $selectedManufacturers = [];

    /**
     * @var string
     */
    public string $engine = '';

    /**
     * @var int
     */
    public int $wheel = 15;

    /**
     * @var string
     */
    public string $engineType = '';

    /**
     * @var string
     */
    public string $searchTerm = '';

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        if($this->searchTerm) dd($this->searchTerm);
        if($this->priceFrom) dd($this->priceFrom);
        if($this->priceTo) dd($this->priceTo);
        if($this->engineType) dd($this->engineType);
        if($this->selectedManufacturers) dd($this->selectedManufacturers);
        $products = Product::query()
            ->search($this->searchTerm)
            ->priceRange($this->priceFrom, $this->priceTo)
            ->engineType($this->engineType)
            ->ofManufacturers($this->selectedManufacturers)
            ->paginate(self::PER_PAGE);
        $manufacturers = Product::select('manufacturer')->distinct()->get();

        return view('livewire.products-component', compact('products', 'manufacturers'));
    }
}
