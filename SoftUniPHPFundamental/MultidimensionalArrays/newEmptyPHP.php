<?php

require_once 'Fuel.php';

class Fuel {

    public $dateRefuel;
    public $eventDistance;
    public $globalDistance;
    public $fuelLiters;
    public $fuelPrice;
    public $totalAmount;
    public $fuelBrand;
    public $gasStation;
    public $drivingType;

    public function input() {
        if (isset($_POST['saveBtn'])) {
            $this->dateRefuel = $_POST['date'];
            $this->eventDistance = $_POST['distance'];
            $this->globalDistance = $_POST['total_odo'];
            $this->fuelLiters = $_POST['fuel_quantity'];
            $this->fuelPrice = $_POST['fuel_amount'];
            $this->totalAmount = $_POST['total_price'];
            $this->gasStation = $_POST['gas_station_name'];
            $this->fuelBrand = $_POST['gas_station_product'];
            $this->drivingType = $_POST['driving_type'];

            $data = array(
                'date' => $this->dateRefuel,
                'distance' => $this->eventDistance,
                'total_odo' => $this->globalDistance,
                'fuel_quantity' => $this->fuelLiters,
                'fuel_amount' => $this->fuelPrice,
                'total_price' => $this->totalAmount,
                'gas_station_name' => $this->gasStation,
                'gas_station_product' => $this->fuelBrand,
                'driving_type' => $this->drivingType
            );

            $this->sendData($data);
        }
    }

    public function sendData($data) {

        $existingData = file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json');
        $dataArray = json_decode($existingData, true);

        if (!isset($dataArray['refuel_events'])) {
            $dataArray['refuel_events'] = array();
        }

        $dataArray['refuel_events'][] = $data;

        $jsonData = json_encode($dataArray);
        file_put_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json', $jsonData);
    }

    /* --------------------------------------------------------------------------------------------------------- */

    public function averageRefuelPerMonth() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $refuel_events = $event['refuel_events'];
            $refuel_counts = array();
            foreach ($refuel_events as $event) {
                $date = strtotime($event['date']);
                $monthYear = date('m-Y', $date);
                if (array_key_exists($monthYear, $refuel_counts)) {
                    $refuel_counts[$monthYear] += 1;
                } else {
                    $refuel_counts[$monthYear] = 1;
                }
            }
            $num_months = count($refuel_counts);
            if ($num_months > 0) {
                $avg_refuels_per_month = array_sum($refuel_counts) / $num_months;
                return $avg_refuels_per_month;
            } else {
                return 0;
            }
        }
    }

    public function averageFuelConsumption() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $totalKilometer = 0;
            $totalFuel = 0;
            foreach ($event['refuel_events'] as $value) {
                $totalKilometer += $value['total_odo'];
                $totalFuel += $value['fuel_quantity'];
            }

            // print_r($totalFuel);

            if ($totalKilometer === 0) {
                return 0;
            } else {
                $fuelConsumption = ($totalFuel / $totalKilometer) * 100;
                $number_format = number_format($fuelConsumption, 2);
                return $number_format;
            }
        }
    }

    public function averagePricePerKm() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $totalKm = $this->lastTimeRefuel();
            $totalRefuelLiters = $this->totalRefuel();
            $price = 0;
            foreach ($event['refuel_events'] as $value) {
                $price += $value['fuel_amount'];
            }
            $price = $price / count($event['refuel_events']);
            if ($totalKm === 0) {
                return 0;
            } else {
                $pricePerKm = ($totalRefuelLiters * $price) / $totalKm;
                $number_format = number_format($pricePerKm, 3);
                return $number_format;
            }
        }
    }

    public function averagePricePerMonth() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            //$sumFromEvent =  $event['refuel_events'];
            //print_r($sumFromEvent);

            $sum = 0;
            foreach ($event['refuel_events'] as $value) {
                $sum += $value['total_price'];
            }
            //print_r($sum);
            $finalSum = $sum / count($event['refuel_events']);
            $number_format = number_format($finalSum, 2);
            return $number_format;
        }
    }

    public function averageQuantityPerMonth() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $quantity = 0;
            $refuelCounts = array();
            foreach ($event['refuel_events'] as $value) {
                $date = strtotime($value['date']);
                $monthYear = date('m-Y', $date);
                if (array_key_exists($monthYear, $refuelCounts)) {
                    $refuelCounts[$monthYear]['quantity'] += $value['fuel_quantity'];
                    $refuelCounts[$monthYear]['count']++;
                } else {
                    $refuelCounts[$monthYear] = array('quantity' => $value['fuel_quantity'], 'count' => 1);
                }
            }
            $finalQuantity = 0;
            foreach ($refuelCounts as $monthYear => $data) {
                if ($data['count'] > 1) {
                    $finalQuantity += $data['quantity'] / $data['count'];
                }
            }
            $finalQuantity = $finalQuantity / count($refuelCounts);
            $numberFormat = number_format($finalQuantity, 2);
            return $numberFormat;
        }
    }

    public function totalRefuel() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $refuel = 0;
            foreach ($event['refuel_events'] as $value) {
                $refuel += $value['fuel_quantity'];
            }
            return $refuel;
        }
    }

    /* ------------------------------------------------------------------------------------------------------- */

    public function lastTimeRefuel() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $lastEvent = end($event['refuel_events']);
            $lastDistance = $lastEvent['distance'];
            return $lastDistance;
            print_r($lastDistance);
        } else {
            return 0;
        }
    }

    public function lastPeriodDistanceTraveled() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $lastDistanceTravel = end($event['refuel_events']);
            return $lastDistanceTravel['distance'];
        }
    }

    public function lastPeriodFuelConsumption() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $lastRefLiter = end($event['refuel_events']);
            $lastLiters = $lastRefLiter['fuel_quantity'];
            $distance = $this->lastPeriodDistanceTraveled();
            if ($distance === 0) {
                return 0;
            } else {
                $fuelCon = ($lastLiters / $distance) * 100;
                $numberFormat = number_format($fuelCon, 2);
                return $numberFormat;
            }
        }
    }

    public function lastPeriodPricePerKm() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 0) {
            $totalKm = $this->lastPeriodDistanceTraveled();
            $refuelLiters = end($event['refuel_events']);
            $totalRefuelLiters = $refuelLiters['fuel_quantity'];
            $price = end($event['refuel_events']);
            $lastPrice = $price['total_price'];
            $lastPricePerKm = ($totalRefuelLiters * $lastPrice) / $totalKm;
            $numberFormat = number_format($lastPricePerKm, 2);
            return $numberFormat;
        }
    }

    public function averageDateDiff() {
        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
        if (isset($event['refuel_events']) && count($event['refuel_events']) > 1) {
            $dates = [];
            foreach ($event['refuel_events'] as $value) {
                $dates[] = $value['date'];
            }
            $periods = [];
            for ($i = 0; $i < count($dates) - 1; $i++) {
                for ($j = $i + 1; $j < count($dates); $j++) {
                    $date1 = new DateTime($dates[$i]);
                    $date2 = new DateTime($dates[$j]);
                    $interval = $date1->diff($date2);
                    $periods[] = $interval->format('%a');
                }
                //print_r($date1);
                // print_r($date2);
                //var_dump($interval);
                //var_dump($periods);
            }
            $averagePeriod = array_sum($periods) / count($periods);
            $numberFormat = number_format($averagePeriod, 0);

            return $numberFormat;
        }
    }

    /* ------------------------------------------------------------------------------------------------------------- */

    public function betterOptionAverageFuelConsumption() {
        if (isset($_POST['reportBtn'])) {
            $gasStation = $_POST['gas_station'];
            $gasStationProduct = $_POST['gas_station_product'];
            $drivingType = $_POST['driving_type'];
        } else {
            return 0;
        }

        if ($gasStation === null || $gasStationProduct === null || $drivingType === null) {
            return 0;
        }

        $event = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);

        if (isset($event['refuel_events']) && count($event['refuel_events']) > 1) {
            $stationArray = [];
            $typeFuelArray = [];
            $priceFuelArray = [];
            $totalDistance = 0;
            $totalFuel = 0;

            foreach ($event['refuel_events'] as $value) {
                if ($value['gas_station_name'] === $gasStation && $value['gas_station_product'] === $gasStationProduct && $value['driving_type'] === $drivingType) {
                    $stationName = $value['gas_station_name'];

                    if (!array_key_exists($stationName, $stationArray)) {
                        $stationArray[$stationName] = [];
                    }
                    $stationArray[$stationName][] = $value['gas_station_name'];

                    $typeFuel = $value['gas_station_product'];

                    if (!array_key_exists($typeFuel, $typeFuelArray)) {
                        $typeFuelArray[$typeFuel] = [];
                    }
                    $typeFuelArray[$typeFuel][] = $value['gas_station_product'];

                    $fuelPrice = $value['total_price'] / $value['fuel_quantity'];

                    if (!array_key_exists($typeFuel, $priceFuelArray)) {
                        $priceFuelArray[$typeFuel] = [];
                    }
                    $priceFuelArray[$typeFuel][$stationName] = $fuelPrice;

                    $totalDistance += $value['distance'];
                    $totalFuel += $value['fuel_quantity'];
                }
            }

            $averageFuelConsumption = ($totalFuel / $totalDistance) * 100;
            $numberFormat = number_format($averageFuelConsumption, 2);
            return $numberFormat;
        }
    }

    public function betterOptionAveragePricePerKm() {
        if (isset($_POST['reportBtn'])) {
            $gasStation = $_POST['gas_station'];
            $gasStationProduct = $_POST['gas_station_product'];
            $drivingType = $_POST['driving_type'];
        } else {
            return 0;
        }

        if ($gasStation === null || $gasStationProduct === null || $drivingType === null) {
            return 0;
        }

        $jsonData = file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json');
        $event = json_decode($jsonData, true);

        $fuelPrice = 0;
        $fuelAmount = 0;
        $totalKm = 0;
        $count = 0;

        foreach ($event['refuel_events'] as $value) {
            if ($value['gas_station_name'] === $gasStation && $value['gas_station_product'] === $gasStationProduct && $value['driving_type'] === $drivingType) {
                $fuelPrice += $value['total_price'];
                $fuelAmount += $value['fuel_quantity'];
                $totalKm += $value['total_odo'];
                $count++;
            }
        }

        if ($count > 0) {
            $pricePerKm = ($fuelAmount * $fuelPrice) / $totalKm;
            $numberFormat = number_format($pricePerKm, 2);
            return $numberFormat;
        } else {
            return 0;
        }
    }

    public function getLowestFuelConsumption() {
        $jsonData = file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json');
        $event = json_decode($jsonData, true);
        $lowestFuelConsumption = null;

        foreach ($event['refuel_events'] as $value) {
            $fuelQuantity = $value['fuel_quantity'];
            $distance = $value['total_odo'];
            $fuelConsumption = ($fuelQuantity / $distance) * 100;

            if ($lowestFuelConsumption === null || $fuelConsumption < $lowestFuelConsumption) {
                $lowestFuelConsumption = $fuelConsumption;
            }
        }

        return number_format($lowestFuelConsumption, 2);
    }

    public function lowestPricePerDistance() {
        if (isset($_POST['reportBtn'])) {
            $gasStation = $_POST['gas_station'];
            $gasStationProduct = $_POST['gas_station_product'];
            $drivingType = $_POST['driving_type'];
        } else {
            return 0;
        }

        if ($gasStation === null || $gasStationProduct === null || $drivingType === null) {
            return 0;
        }

        $jsonData = file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json');
        $event = json_decode($jsonData, true);
        $lowestPrice = PHP_FLOAT_MAX;

        foreach ($event['refuel_events'] as $value) {
            if ($value['gas_station_name'] === $gasStation && $value['gas_station_product'] === $gasStationProduct && $value['driving_type'] === $drivingType) {
                $pricePerKm = $value['total_price'] / $value['total_odo'];
                if ($pricePerKm < $lowestPrice) {
                    $lowestPrice = $pricePerKm;
                }
            }
        }

        $numberFormat = number_format($lowestPrice, 2);
        return $numberFormat;
    }

    /* ----------------------------------------------------------------------------------------------------------------------------- */

    public function deleteRow($index) {

        $data = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'));
        unset($data->refuel_events[$index]);
        file_put_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json', json_encode($data));
    }

    public function editRow($editing_id, $event) {
        if (isset($_POST['editBtn'])) {
            $newData = [
                'date' => $_POST['date'],
                'distance' => $_POST['distance'],
                'total_odo' => $_POST['total_odo'],
                'fuel_quantity' => $_POST['fuel_quantity'],
                'fuel_amount' => $_POST['fuel_amount'],
                'total_price' => $_POST['total_price'],
                'gas_station_name' => $_POST['gas_station_name'],
                'gas_station_product' => $_POST['gas_station_product'],
                'driving_type' => $_POST['driving_type']
            ];
            $data = json_decode(file_get_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json'), true);
            $data['refuel_events'][$editing_id] = $newData;
            file_put_contents('C:\xampp\htdocs\CarCalculation\database\dataFile.json', json_encode($data));
        }
    }

}
