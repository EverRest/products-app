<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Exception;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * @var array|string[]
     */
    private array $manufacturers = ['Toyota', 'Chevrolet', 'Jeep', 'Ford', 'BMW', 'Mercedes', 'Audi', 'Honda', 'Tesla', 'Jeep', 'Fiat', 'Lancia', 'Mitsubishi'];

    /**
     * @var array|string[]
     */
    private array $models =  ['Model X', 'Model S', 'Accord', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6','Compass', 'Cherokee', 'Pajero', 'Camaro', 'Yaris', 'Camry', 'Mustang', '3 Series', 'A4', 'A1', 'A2', 'A3', 'A5', 'A6', 'A7', 'A8', 'C-Class', 'E-Class', 'S-Class',];

    /**
     * @var array|string[]
     */
    private array $descriptions = [
        'An economic and reliable family car.',
        'A luxurious and comfortable ride.',
        'Sporty and fun to drive.',
        'Spacious and versatile for all your needs.',
        'Elegant design with advanced technology.'
    ];

    /**
     * @var array|int[]
     */
    private array $engine = [1300, 1500, 1600, 1800, 2000, 2400, 2600, 3000, 3500, 4000, 4500, 5000];

    /**
     * @var array|int[]
     */
    private array $wheels = [13,14,15,16,17,18,19,20,21,22];

    /**
     * @var array|string[]
     */
    private array $engineTypes = ['electric', 'diesel', 'hybrid', 'gasoline',];

    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        $manufacturersCount = count($this->manufacturers);
        $modelsCount = count($this->models);
        $descriptionsCount = count($this->descriptions);
        $enginesCount = count($this->engine);
        $wheelsCount = count($this->wheels);
        $typesCount = count($this->engineTypes);

        for($i = 0; $i<50; $i++)
        {
            $model = $this->models[random_int(0, $modelsCount-1)];
            $manufacturer = $this->manufacturers[random_int(0, $manufacturersCount-1)];
            $description = $this->descriptions[random_int(0, $descriptionsCount-1)];
            $engine = $this->engine[random_int(0, $enginesCount-1)];
            $wheels = $this->wheels[random_int(0, $wheelsCount-1)];
            $type = $this->engineTypes[random_int(0, $typesCount-1)];
            Product::firstOrCreate([
                'name' => $model,
                'price' => random_int(10, 120) * 1000,
                'description' => $description,
                'image' => 'https://picsum.photos/500/500',
                'manufacturer' => $manufacturer,
                'engine' => $engine,
                'wheel' => $wheels,
                'engine_type' => $type
            ]);
        }
    }
}
