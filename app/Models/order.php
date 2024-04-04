<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_date',
        'status',
        'order_status',
        'payment_status',
        'user_id',
        'product_id',
        'product_orientation_id',
        'product_size_id',
        'product_sheet_id',
        'productpapers_id',
        'productcovers_id',
        'cover_type',
        'coversupgrades_id',
        'coverupgradecolors_id',
        'coverfrontimg',
        'boxsleeve_id',
        'page_qty',
        'zone_id',
        'sheetValue',
        'paperValue',
        'coverValue',
        'boxSleeveValue',
        'productValue',
        'shippingValue',
        'order_total',
        'discount',
        'delivery_address',
        'printing_type',
        'printing_price',
        'delivery_partner_link',
        'delivery_tracking_no',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('orderScope', function (Builder $builder) {
            $builder->with(["productboxsleeveUpgradeColor", "productboxsleeveUpgrade", "orderDetaild", "orderPhotosLink", 'costomer', 'product', 'productorientation', 'productsize', 'productsheet', 'productpaper', 'productcover', 'coversupgrade', 'coversupgradecolor', 'productboxsleeve', 'countryzone']);
        });
    }

    public function costomer()
    {
        return $this->hasOne(customer::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'product_id')->withoutGlobalScope('orientationScope')->withTrashed();
    }

    public function productorientation()
    {
        return $this->hasOne(orientation::class, 'id', 'orientation_id')->withoutGlobalScope('orientationScope');
    }

    public function productsize()
    {
        return $this->hasOne(Size::class, 'id', 'size_id')->withoutGlobalScope('sizeScope')->withTrashed();
    }

    public function productsheet()
    {
        return $this->hasOne(sheet::class, 'id', 'sheet_id')->withTrashed();
    }

    public function productpaper()
    {
        return $this->hasOne(paper::class, 'id', 'papers_id')->withTrashed();
    }

    public function productcover()
    {
        return $this->hasOne(covers::class, 'id', 'covers_id')->withoutGlobalScope('sheetscop')->withTrashed();
    }

    public function coversupgrade()
    {
        return $this->hasOne(coversupgrades::class, 'id', 'coversupgrades_id')->withoutGlobalScope('ancient')->withTrashed();
    }

    public function coversupgradecolor()
    {
        return $this->hasOne(color::class, 'id', 'coverupgradecolors_id')->withTrashed();
    }

    public function productboxsleeve()
    {
        return $this->hasOne(boxsleeve::class, 'id', 'boxsleeve_id')->withTrashed();
    }
    public function productboxsleeveUpgrade()
    {
        return $this->hasOne(boxsleeveupgrade::class, 'id', 'boxsleeveupgrades_id')->withoutGlobalScope('boxandsleeveUpgradeScop');
    }
    public function productboxsleeveUpgradeColor()
    {
        return $this->hasOne(color::class, 'id', 'boxsleevecolors_id')->withTrashed();
    }

    public function countryzone()
    {
        return $this->hasOne(countryzone::class, 'id', 'zone_id')->withTrashed();
    }

    public function orderDetaild()
    {
        return $this->hasOne(ordercustomdetail::class, 'order_id', 'id');
    }

    public function orderPhotosLink()
    {
        return $this->hasOne(orderdata::class, 'order_id', 'id');
    }
}
