<div class="your-class">
    <?php foreach($property_with_images as $property) {
    
    ?>
    <a href="/property/<?php echo $property->area . "/" . $property->suburb . "/" . $property->seoname ?>" class="slick-slider-content">
        <img class="slick-slider-img" data-lazy="/wp-content/uploads/<?php echo $property->imagepath ?>" />
        <div class="property-text">
            <p class="heavy-text"><?php echo $property->area ?>, <?php echo $property->suburb ?></p>
            <p class="heavy-text">R<?php echo $property->listed_price ?></p>
            <p class="bed-bath-and-beyond"><?php echo $property->number_of_bedrooms ?> Bed | <?php echo $property->number_of_bathrooms ?> Bath</p>
        </div>
    </a>
    <?php 
    }
    ?>
</div>

