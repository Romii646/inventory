
const tableNames = {
    "graphicscards": [
        {
           "gpu_id": "Graphic Card ID",
           "name": "Brand Name",
           "condition": {
                "description": "graphic card condition",
                "condition": ["GOOD", "BROKEN"]    
           },
           "cost": "cost",
           "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "keyboards": [
        {
            "kb_id": "Keyboard ID",
            "name": "Brand Name",
            "condition": {
                "description": "keyboard condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "mice": [
        {
            "mouse_id": "Mouse ID",
            "name": "Brand Name",
            "condition": {
                "description": "mice condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "minipc": [
        {
            "mipc_id": "Mini PC ID",
            "name": "Brand Name",
            "condition": {
                "description": "miniPC condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"],
            "location":""
        }
    ],
    "monitors": [
        {
            "monitor_id": "Monitor ID",
            "name": "Brand Name",
            "width": ["12-18 inch", "19-24 inch", "25-32 inch"],
            "condition": {
                "description": "Monitor condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "motherboards": [
        {
            "mobo_id": "MotherBoard ID",
            "name": "Brand Name",
            "size": ["ATX", "mATX", "ITX"],
            "condition": {
                "description": "Motherboard condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "pcsetups":[
        {
            "pc_id": "Computer ID",
            "mobo_id": "MotherBoard ID",
            "gpu_id": "Graphic Card ID",
            "ram_id": "RamStick ID",
            "psu_id": "Pwoer Supply ID",
            "monitor_id": "Monitor ID",
            "acc_id": "Accessory ID",
            "kb_id": "KeyBoard ID",
            "mouse_id": "Mouse ID",
            "tableLocation": "Table Location",
            "PCcondition":"Current Condition of the PC"
        }
    ],
    "powersupplies": [
        {
            "psu_id": "Power Supply ID",
            "name": "Brand Name",
            "wattage": "Wattage",
            "modular": ["yes", "no"],
            "condition": {
                "description": "Power supply condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ],
    "ramsticks": [
        {
            "ram_id": "RAM ID",
            "name": "Brand Name",
            "type":["DDR3", "DDR4", "DDR5"],
            "speed": "Ram speed",
            "condition": {
                "description": "RAM condition",
                "condition": ["GOOD", "BROKEN"]    
           },
            "cost": "cost",
            "status": ["IN_USE", "STORAGE", "DISPOSED"]
        }
    ]
}

export default tableNames;