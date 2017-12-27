<?php
//have to change back for updating to bscacad
create_mysql_table();

insert_into_products();



function insert_into_products(){
    $conn = Connect();   
    $sql = "INSERT INTO products (title, slug, description, price, image, stock, category)
    VALUES ('200KW Dual Siemens Azure AC Induction 3 Phase Motor', 
            'Dual_Siemens_Azure', 
            'We really like the OEM quality of these Siemens motors, they have been bench tested to 160HP and 221 ft lbs of torque each at 300V and 400A. DE of the motor has a 1-3/4 inch shaft with a 3/8 inch keyway. Weighs in at 390 pounds and is IP67 sealed. Features liquid cooling, glycol and water. You will pretty much have to run a full size radiator with this setup. Total motor length from flange to end of motor is 34.25 inch. ',
            '8995.00',
            '../resources/images/200kw-dual-siemens-azure-ac-induction-3-phase-motor-1pv5135-4ws14-1.jpg',
            '100',
            'motor'
            ), 
            ('AM Racing AMR 250-90 Single AC Motor', 
            'AM_Racing_AMR_Single', 
            'This AM Racing motor is based on the very proven Remy 250-90 cartridge rotor using their HVH technology. (High Voltage Hairpin) This high efficiency permanent magnet motor is housed in a billet aluminum case with an integrated oil pump, and water/glycol heat exchanger. Mainly used in race applications, this motor is designed for long life use, and is perfectly suited for high output daily driving applications. Can be used in conjunction with the Rhinehart 100kW or 150kW motor controller/inverter.',
            '9288.00',
            '../resources/images/am-racing-250-90-ac-motor-liquid-cooled-remy-cartridge-1.jpg',
            '100',
            'motor'
            ),
            ('AM Racing AMR Dual Stack 250-90 AC Motor',
            'AM_Racing_AMR_Dual',
            'This AM Racing motor is based on the very proven Remy 250-90 cartridge rotor using their HVH technology. (High Voltage Hairpin) This high efficiency permanent magnet motor is housed in a billet aluminum case with an integrated oil pump, and water/glycol heat exchanger. Mainly used in race applications, this motor is designed for long life use, and is perfectly suited for high output daily driving applications.',
            '18488.00',
            '../resources/images/am-racing-amr-dual-stack-250-90-ac-motor-liquid-cooled-permanent-magnet-remy.jpg',
            '100',
            'motor'    
            ),
            ('TransWarp 9 DC Motor',
            'TransWarp_9',
            'This version of the Warp 9 is fitted with a universal joint for a Turbo 400 transmission, and fitted with a 32 tooth spline, and housed with an additional drive end bearing. This motor is great for dual motor applications in direct drive vehicles.',
            '2499.00',
            '../resources/images/transwarp-9-dc-motor.jpg',
            '100',
            'motor'   
            ),         
            ('Curtis 1238-7601 HPEVS AC-20 Brushless AC Motor',
            'Curtis_1238',
            'The AC20 is an AC induction motor that operates at 72-130V. It can draw up to 650A producing a peak of 65 HP and 82 ft-lbs of torque out to 5100 RPM. This kit works very well in a small sized vehicles, Karts and Motorcycles. Features regenerative braking and idle function as well. At a modest 130 controller voltage it makes a safer low voltage system that will give you lots of reliable EV miles.',
            '3375.00',
            '../resources/images/curtis-1238-7601-hpevs-ac-20-brushless-ac-motor-kit-96-volt-5.jpg',
            '100',
            'motor'  
            ),
            ('Curtis 1239e-8521 HPEVS Dual AC-35 Brushless Motor',
            'Curtis_1239e',
            'This is a great dual motor setup for vehicles up to 4500 pounds, or a high performance setup in lighter vehicles. The single motor case makes installation easier than other dual motor setups, and twin Curtis 1239e-8521 controllers are included. This is a ready to go system that with higher voltage controllers and motor windings, and it hits 165 horsepower and a whopping 190 pounds of torque! ',
            '8900.00',
            '../resources/images/dual-ac-35-brushless-motor-kit-144-volt.jpg',
            '100', 
            'motor'    
            ),
            ('Manzanita Micro Zilla 1K Series DC Motor Controller',
            'Manzanita_Micro',
            'The Zilla motor controller package comes complete with a standard Hairball. All Zillas require a Hairball in order to run. You can select options for your Hairball above if desired. The Zilla package also includes a three foot Cat-5 cable with ferrite to connect the Zilla and Hairball, a serial cable and adapter for connecting a laptop computer to the Hairball, a contactor snubber diode, shorting plug, two high voltage stickers and a Zilla screwdriver. The computer that you will need for setting Hairball settings must have a RS-232 serial port with a 9 pin connection.',
            '2600.00',
            '../resources/images/manzanita-micro-zilla-1k-series-dc-motor-controller-3.jpg',
            '100', 
            'controller'    
            ),
            ('NetGain WarpDrive Industrial Controller',
            'NetGain_WarpDrive_Controller',
            'With over a half-megawatt of power output capability and its professional quality, this silent powerhouse is the new controller of choice! Designed with ruggedness in mind, and ease of use, it is the perfect controller for hobbyists and OEMs alike. The WarP-Drive has the quality you would expect from a NetGain product, at a price you can afford.',
            '2850.00',
            '../resources/images/netgain-warpdrive-industrial-controller.jpg',
            '100', 
            'controller'    
            ),
            ('Evnetics Shiva',
            'Evnetics_Shiva',
            'The Shiva is the mother of all controllers! The guys at Evnetics came up with a controller to end all controller wars, and one that is capable of a continuous 3000 amps and a 425 volt limit. There are only a handful of these in the wild and are only intended for the most serious performance EVs. ',
            '10990.00',
            '../resources/images/evnetics-shiva-4000-amp-controller-2.jpg',
            '100', 
            'controller'    
            ),
            ('CALB 100 Ah CA Series Lithium Iron Phosphate Battery',
            'CALB_100_CA',
            'The CALB LiFePO4 batteries are manufactured under much tighter specifications, and for this reason we have found in our own experience that these are the batteries of choice. Having very consistent internal resistance characteristics, these batteries are also well know for having a capacity that generally outperforms their specification by 10% or more.',
            '135.00',
            '../resources/images/calb-100-ah-ca-series-lithium-iron-phosphate-battery.jpg',
            '999', 
            'battery'    
            ),
            ('CALB 100 Ah SE Series Lithium Iron Phosphate Battery',
            'CALB_100_SE',
            'The CALB LiFePO4 batteries are manufactured under much tighter specifications, and for this reason we have found in our own experience that these are the batteries of choice. Having very consistent internal resistance characteristics, these batteries are also well know for having a capacity that generally outperforms their specification by 10% or more. These batteries are very reliable. ',
            '135.00',
            '../resources/images/calb-100-ah-battery-1.jpg',
            '999', 
            'battery'    
            ),
            ('Voltronix 60 Ah Lithium Iron Phosphate Battery',
            'Voltronix_60',
            'The Voltronix LiFePO4 batteries are a great cell, these batteries are also known for having a capacity that generally outperforms their specification by 5-10%. These batteries are very reliable.',
            '78.00',
            '../resources/images/voltronix-60-ah-lithium-iron-phosphate-battery.jpg',
            '999', 
            'battery'    
            ),
            ('Manzanita Micro PFC 20M Charger',
            'Manzanita_20M_Charger',
            'The PFC-20 is designed to charge any battery pack from 12 volts to 360 volts nominal (14.4 to 450 peak.) It is power factor corrected and designed for 30 amps in, 20 amps out.',
            '2149.00',
            '../resources/images/pfc-20.jpg',
            '100', 
            'charger'    
            ),
            ('Elcon PFC5000 Charger',
            'Elcon_PFC5000',
            'The PFC5000 is an excellent low cost solution to high voltage, high amperage charging. Being one of the more versatile chargers by being able to accept both 110v and 220v, the PFC5000 packs a punch. At 220 volts, the charger delivers 5kW of power, but throttles back to 2kW of power when hooked up to 110 volts, thereby allowing it to charge from a normal 15a household circuit',
            '1699.00',
            '../resources/images/elcon-pfc5000-charger.jpg',
            '100', 
            'charger'    
            ),
            ('Elcon PFC1500 Charger',
            'Elcon_PFC1500',
            'The PFC1500 is an excellent low cost solution for low amperage charging that comes in a sealed enclosure. Being one of the more versatile chargers by being able to accept both 110v and 220v, the PFC1500 is a great low to mid range charger. These chargers are voltage specific, so we have to program the charge curves before delivery. ',
            '569.00',
            '../resources/images/elcon-pfc-1500.jpg',
            '100', 
            'charger'    
            ),
            ('Borg Warner 31-03 eGearDrive 8.28',
            'Borg_Warner',
            'The BorgWarner 31-03 eGearDrive is a purpose built, high performance transmission that can be broadly adapted to a variety of electric propulsion systems. Systems enable launch assist, energy recovery, and AWD performance for the secondary-driven axle on any type of vehicle.',
            '2995.00',
            '../resources/images/borg-warner-31-03-egeardrive-8-28.jpg',
            '100', 
            'drivetrain'    
            ),
            ('Powerglide 2 Speed Direct Drive Transmission for EV Motors - EVGlide',
            'Powerglide_2_Speed',
            'Our race proven Powerglide 2 Speed Transmission is the result of 2 years of testing, modifying, and racing this transmission. We are finally satisfied that we have a drop in solution for a 2 speed with reverse, and the security of a true park pawl. Stock this transmission can handle 1000 horsepower, but we have optional gear sets that are rated up to 3500 horsepower applications. The wide variety of gear sets, shifters and parts for this transmission make it ideal for your modern EV conversion.',
            '4995',
            '../resources/images/powerglide-2-speed-direct-drive-transmission-for-ev-motors.jpg',
            '100', 
            'drivetrain'    
            )";
            





if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    //$conn->query($sql);//sends $sql as a query through the open connection
   // echo 'good';
    $conn->close();//close connection
}

function create_mysql_table(){
    $conn = Connect();

        $conn->query("DROP TABLE IF EXISTS products, orders, orders_products,customers,addresses,payments, users");
        //deletes table if it already exists
            
    //sql to create tables
        $sql = "CREATE TABLE products (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        description TEXT,
        price FLOAT NOT NULL,
        image VARCHAR(255),
        stock INT(11) NOT NULL,
        category VARCHAR(255) NOT NULL,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE orders (
        id INT (11) NOT NULL AUTO_INCREMENT,
        hash VARCHAR(255) NOT NULL,
        total FLOAT NOT NULL,
        address_id INT(11) NOT NULL,
        paid TINYINT(1) NOT NULL,
        customer_id INT(11),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE orders_products (
        id INT (11) NOT NULL AUTO_INCREMENT,
        order_id INT(11) NOT NULL,
        product_id INT(11) NOT NULL,
        quantity INT(11) NOT NULL,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE customers (
        id INT (11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE addresses (
        id INT (11) NOT NULL AUTO_INCREMENT,
        address1 VARCHAR(255) NOT NULL,
        address2 VARCHAR(255),
        city VARCHAR(255) NOT NULL,
        state VARCHAR(25) NOT NULL,
        zip VARCHAR(10) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE payments (
        id INT (11) NOT NULL AUTO_INCREMENT,
        order_id INT(11) NOT NULL,
        failed TINYINT(1) NOT NULL,
        transaction_id VARCHAR(255),
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);

    $sql = "CREATE TABLE users (
        id INT (11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(255) NOT NULL,
        name VARCHAR(255),
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP,
        updated_at TIMESTAMP,
        PRIMARY KEY (ID)
        )";
    insert_into_table($conn, $sql);


$conn->close();//close connection
}
//END Create MYSQL Table******************************


function insert_into_table($connection, $data){
        if ($connection->query($data) === TRUE) {
            echo "Table created successfully" . '<br>';
        } else {
            echo "Error creating table: " . $connection->error;//outputs error code
        }       
}


/* Connect - establishes a connection to a MYSQL database on a server*/
function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "marronja01";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Connection failed: " . $conn->connect_error);

 return $conn;
}

//THIS WILL CREATE THE DATABASE TABLES

//create_mysql_table();


?>