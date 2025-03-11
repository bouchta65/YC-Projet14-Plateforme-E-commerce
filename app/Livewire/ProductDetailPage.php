<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetailPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->firstOrFail();
        return view('livewire.product-detail-page', compact('product'));
    }
}
