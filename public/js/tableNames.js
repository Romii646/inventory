window.tableNames = {
  accessories: [
    {
      acc_id: "Accessory ID",
      name: "Brand Name",
      type: ["Mouse", "Keyboard", "Headset", "Webcam"],
      condition: {
        description: "graphic card condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  graphicscards: [
    {
      gpu_id: "Graphic Card ID",
      name: "Brand Name",
      condition: {
        description: "graphic card condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  keyboards: [
    {
      kb_id: "Keyboard ID",
      name: "Brand Name",
      condition: {
        description: "keyboard condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
      Location: "Location",
    },
  ],
  mice: [
    {
      mouse_id: "Mouse ID",
      name: "Brand Name",
      condition: {
        description: "mice condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  minipc: [
    {
      mipc_id: "Mini PC ID",
      name: "Brand Name",
      condition: {
        description: "miniPC condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
      location: "",
    },
  ],
  monitors: [
    {
      monitor_id: "Monitor ID",
      name: "Brand Name",
      width: ["12-18 inch", "19-24 inch", "25-32 inch"],
      condition: {
        description: "Monitor condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  motherboards: [
    {
      mobo_id: "MotherBoard ID",
      name: "Brand Name",
      size: ["ATX", "mATX", "ITX"],
      condition: {
        description: "Motherboard condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  powersupplies: [
    {
      psu_id: "Power Supply ID",
      name: "Brand Name",
      wattage: "Wattage",
      modular: ["yes", "no"],
      condition: {
        description: "Power supply condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  ramsticks: [
    {
      ram_id: "RAM ID",
      name: "Brand Name",
      type: ["DDR3", "DDR4", "DDR5"],
      speed: "Ram speed",
      condition: {
        description: "RAM condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
    },
  ],
  storage_components: [
    {
      storage_id: "Storage ID",
      storage_slot_id: "Storage Slot ID",
      name: "Brand Name",
      type: ["SSD", "HDD"],
      condition: {
        description: "Storage part condition",
        condition: ["GOOD", "BROKEN"],
      },
      cost: "Cost",
      status: ["IN_USE", "STORAGE", "DISPOSED"],
      location: "Location of the storage part",
    },
  ],
  storage_slots: [
    {
      storage_slot_id: "Storage Slot ID",
      description: "Description of the storage slot",
    },
  ],
};
