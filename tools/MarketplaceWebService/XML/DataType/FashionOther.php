<?php
class MarketplaceWebService_XML_DataType_FashionOther extends MarketplaceWebService_XML_DataType_Base {
    public function __construct() {
        parent::__construct();
    }

    public function setParentage($value) {
        if (!in_array($value, array('parent', 'child'))) {
            throw new InvalidArgumentException('Invalid parentage value');
        }
        return $this->set('Parentage', $value);
    }
    public function setVariationTheme($value) {
        if (!in_array($value, array('BandColor', 'Color', 'StyleName'))) {
            throw new InvalidArgumentException('Invalid variation theme');
        }
        return $this->set('VariationTheme', $value);
    }
    public function setLength($value) {
        return $this->set('Length', $value);
    }
    public function setMetalType($value) {
        if( empty($value) )
            throw new InvalidArgumentException("MetalType value should not be empty");
        return $this->set('MetalType', $value);
    }
    public function addMaterial($value) {
        if( empty($value) )
            throw new InvalidArgumentException("Material value should not be empty");
		return $this->add('Material', $value, 4);
	}
	public function setMetalStamp($value) {
		return $this->set('MetalStamp', $value);
	}
	public function setTotalMetalWeight($value) {
		return $this->set('TotalMetalWeight', $value);
	}
	public function setDiameter($value) {
		return $this->set('Diameter', $value);
	}
	public function setHeight($value) {
		return $this->set('Height', $value);
	}
	public function setWidth($value) {
		return $this->set('Width', $value);
	}
	public function setEstatePeriod($value) {
		return $this->set('EstatePeriod', $value);
	}
	public function setNumberOfStones($value) {
		return $this->set('NumberOfStones', $value);
	}
	public function addStone($value) {
		return $this->add('Stone', $value, 3);
	}
	public function setNumberOfPearls($value) {
		return $this->set('NumberOfPearls', $value);
	}
	public function setSellerWarrantyDescription($value) {
		return $this->set('SellerWarrantyDescription', $value);
	}
	public function setModelYear($value) {
		return $this->set('ModelYear', $value);
	}
	public function setSeason($value) {
		return $this->set('Season', $value);
	}
	public function setCountryOfOrigin($value) {
		return $this->set('CountryOfOrigin', $value);
	}
	public function setStyleKeywords($value) {
		return $this->set('StyleKeywords', $value);
	}
	public function setOccasionLifestyle($value) {
		return $this->set('OccasionLifestyle', $value);
	}
	public function setLithiumBatteryEnergyContent($value) {
		return $this->set('LithiumBatteryEnergyContent', $value);
	}
	public function setLithiumBatteryPackaging($value) {
        if( !in_array($value, array(
            'batteries_contained_in_equipment',
            'batteries_only',
            'batteries_packed_with_equipment'
        ))) throw new InvalidArgumentException("Invalid LithiumBatteryPackaging value $value");
		return $this->set('LithiumBatteryPackaging', $value);
	}
	public function setLithiumBatteryVoltage($value) {
		return $this->set('LithiumBatteryVoltage', $value);
	}
	public function setLithiumBatteryWeight($value) {
		return $this->set('LithiumBatteryWeight', $value);
	}
	public function setNumberOfLithiumIonCells($value) {
		return $this->set('NumberOfLithiumIonCells', $value);
	}
	public function setNumberOfLithiumMetalCells($value) {
		return $this->set('NumberOfLithiumMetalCells', $value);
	}
	public function setBattery($value) {
		return $this->set('Battery', $value);
	}
	public function setBackFinding($value) {
		return $this->set('BackFinding', $value);
	}
	public function setBatteryCellComposition($value) {
		return $this->set('BatteryCellComposition', $value);
	}
	public function setBatteryDescription($value) {
		return $this->set('BatteryDescription', $value);
	}
	public function setCertificate($value) {
		return $this->set('Certificate', $value);
	}
	public function setChainType($value) {
		return $this->set('ChainType', $value);
	}
	public function setClaspType($value) {
		return $this->set('ClaspType', $value);
	}
	public function setCollectionName($value) {
		return $this->set('CollectionName', $value);
	}
	public function setColorMap($value) {
		return $this->set('ColorMap', $value);
	}
	public function setDepartmentName($value) {
		return $this->set('DepartmentName', $value);
	}
	public function setReSizable($value) {
		return $this->set('ReSizable', $value);
	}
	public function setItemLengthDescription($value) {
		return $this->set('ItemLengthDescription', $value);
	}
    public function setItemShape($value) {
        if( empty($value) )
            throw new InvalidArgumentException("ItemShape value should not be empty");
		return $this->set('ItemShape', $value);
	}
	public function setItemStyling($value) {
		return $this->set('ItemStyling', $value);
	}
	public function setOccasionType($value) {
		return $this->set('OccasionType', $value);
	}
	public function setPackageTypeName($value) {
		return $this->set('PackageTypeName', $value);
	}
	public function setPatternName($value) {
		return $this->set('PatternName', $value);
	}
	public function setRingSize($value) {
        $value = (int)$value;
        if( $value < 1 || $value > 13 )
            throw new InvalidArgumentException("Value for RingSize must be between 1 and 13 inclusive");
		return $this->set('RingSize', $value);
	}
	public function setSizingLowerRange($value) {
		return $this->set('SizingLowerRange', $value);
	}
	public function setSizingUpperRange($value) {
		return $this->set('SizingUpperRange', $value);
	}
	public function setSettingType($value) {
		return $this->set('SettingType', $value);
	}
	public function setTotalDiamondWeight($value) {
		return $this->set('TotalDiamondWeight', $value);
	}
	public function setTotalGemWeight($value) {
		return $this->set('TotalGemWeight', $value);
	}
    public function getXML($feed) {
        $watch = $feed->createNode('FashionOther');
        $parentage = $this->get('Parentage');
        $vtheme = $this->get('VariationTheme');
        $mtype = $this->get('MetalType');
        $length = $this->get('Length');
        if( !empty($parentage) || !empty($vtheme) || !empty($mtype) || !empty($length) ) {
            $variation_data = $watch->appendChild( $feed->createNode('VariationData') );
            $feed->addNode($variation_data, $this, 'Parentage');
            $feed->addNode($variation_data, $this, 'VariationTheme');
            $feed->addNode($variation_data, $this, 'Length');
            $feed->addNode($variation_data, $this, 'MetalType');
        }
		$feed->addNode($main, $this, 'Material');
		$feed->addNode($main, $this, 'MetalStamp');
		$feed->addNode($main, $this, 'TotalMetalWeight');
		$feed->addNode($main, $this, 'Diameter');
		$feed->addNode($main, $this, 'Height');
		$feed->addNode($main, $this, 'Width');
		$feed->addNode($main, $this, 'EstatePeriod');
		$feed->addNode($main, $this, 'NumberOfStones');
		$feed->addNode($main, $this, 'Stone');
		$feed->addNode($main, $this, 'NumberOfPearls');
		$feed->addNode($main, $this, 'SellerWarrantyDescription');
		$feed->addNode($main, $this, 'ModelYear');
		$feed->addNode($main, $this, 'Season');
		$feed->addNode($main, $this, 'CountryOfOrigin');
		$feed->addNode($main, $this, 'StyleKeywords');
		$feed->addNode($main, $this, 'OccasionLifestyle');
		$feed->addNode($main, $this, 'LithiumBatteryEnergyContent');
		$feed->addNode($main, $this, 'LithiumBatteryPackaging');
		$feed->addNode($main, $this, 'LithiumBatteryVoltage');
		$feed->addNode($main, $this, 'LithiumBatteryWeight');
		$feed->addNode($main, $this, 'NumberOfLithiumIonCells');
		$feed->addNode($main, $this, 'NumberOfLithiumMetalCells');
		$feed->addNode($main, $this, 'Battery');
		$feed->addNode($main, $this, 'BackFinding');
		$feed->addNode($main, $this, 'BatteryCellComposition');
		$feed->addNode($main, $this, 'BatteryDescription');
		$feed->addNode($main, $this, 'Certificate');
		$feed->addNode($main, $this, 'ChainType');
		$feed->addNode($main, $this, 'ClaspType');
		$feed->addNode($main, $this, 'CollectionName');
		$feed->addNode($main, $this, 'ColorMap');
		$feed->addNode($main, $this, 'DepartmentName');
		$feed->addNode($main, $this, 'ReSizable');
		$feed->addNode($main, $this, 'ItemLengthDescription');
		$feed->addNode($main, $this, 'ItemShape');
		$feed->addNode($main, $this, 'ItemStyling');
		$feed->addNode($main, $this, 'OccasionType');
		$feed->addNode($main, $this, 'PackageTypeName');
		$feed->addNode($main, $this, 'PatternName');
		$feed->addNode($main, $this, 'RingSize');
		$feed->addNode($main, $this, 'SizingLowerRange');
		$feed->addNode($main, $this, 'SizingUpperRange');
		$feed->addNode($main, $this, 'SettingType');
		$feed->addNode($main, $this, 'TotalDiamondWeight');
		$feed->addNode($main, $this, 'TotalGemWeight');
        return $watch;
    }
}
