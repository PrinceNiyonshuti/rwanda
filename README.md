<p align="center"><a href="#" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/1/17/Flag_of_Rwanda.svg" width="400"></a></p>

## About - Rwanda

This is a simple laravel API that returns provinces, districts, sectors, villages and cells found in Rwanda.

Rwanda is organized in four provinces in addition to the Kigali city, 30 Districts, 416 Sectors, 2148 Cells and 14 837 Villages.

## Endpoints

- [Provinces](#/api/provinces)
- [Districts](#/api/districts)
- [Sectors](#/api/sectors)
- [Cells](#/api/cells)
- [Villages](#/api/villages)

## Usage

---

All inputs are case-insensitive.

### Provinces

Returns array of country provinces , if no params is given

```json
[
    {
        "provinceName": "Kigali"
    },
    {
        "provinceName": "East"
    },
    {
        "provinceName": "North"
    },
    {
        "provinceName": "South"
    },
    {
        "provinceName": "West"
    }
]
```
#### Available parameter for province endpoint

[url/api/provinces/2](#) for viewing single province
If province id is given it returns an object of province details.
It returns `[null]` if province is not found.
```json
{
    "id": 2,
    "provinceName": "East",
}
```
### Districts

By default it returns an array of country districts, if no params (province) is given

- Districts(province)

  If province is given it returns an array of districts found in that province.
  It returns `[]` if province is not found.

### Sectors

By default it returns array of country sectors, if no params (province, district) are given

- Sectors(province, district)

  If province and district are given it returns an array of sectors found from the given district in that province.
  It returns `[]` if either province or district is not found.

### Cells

By default it returns an array of all country cells.

- Cells(province, district, sector)

  if province, district and sector are given it returns an array of Cells found from the given sector.
  It returns `[]` if either province, district or sector is not found.

### Villages

By default it returns an array of all country villages.

- Villages(province, district, sector, cell)

  if province, district, sector and cell are given it returns an array of Villages found from the given cell.
  It returns `[]` if either province, district , sector or cell is not found.

## Install - run the following scripts
    composer install
    cp .env.example .env or copy .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan storage:link
    php artisan queue:work
    php artisan serve

# Contributors

| [<img src="https://github.com/PrinceNiyonshuti.png" width="100px;"><br><sub><b>Niyonshuti Prince</b></sub>](https://github.com/PrinceNiyonshuti) |
| :------------------------------------------------------------------------------------------------------------------------ |

## Author

Niyonshuti Prince
