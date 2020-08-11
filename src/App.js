import React, { useState, useRef } from "react";
import Inventory from "./Inventory.js";
import Header from "./Header";

// Void -> Array
// Generates a default/initial inventory
function createInitialInventory() {
  let defaultItems = [];

  for (let i = 0; i < 10; i++) {
    defaultItems.push(createInitialItem(i));
  }

  return defaultItems;
}

// Void -> Object
// Generates an item with the given ID to go into the initial inventory.
function createInitialItem(id) {
  let explodes; // is this element explosive?

  // all odd elements are marked as explosive
  id % 2 === 0 ? (explodes = false) : (explodes = true);

  return {
    id: id,
    name: `Item ${id}`,
    explosive: explodes,
  };
}

function App() {
  const [items, setItems] = useState(createInitialInventory);
  const textFieldRef = useRef();
  const errorRef = useRef('');

  function handleAddItem(e) {
    let name = textFieldRef.current.value;
        // disallows empty names
    if(name === '') {return;}

    for (const item of items) {
      if (item.name === name) {
        // TODO: display error message on addition of item with existing name
        return;
      }
    }

    let newItem = {
      id: 2055,
      name: name,
      explosive: true
    }
    
    setItems(prev => [...prev, newItem]);
  }

  // Event -> Void
  // Clears the item entry text field
  function handleClear(e) {
    textFieldRef.current.value = null;
  }

  // Event -> Void
  // Removes the item with the given name from the inventory
  function handleRemoveItem(e) {
    
    let name = textFieldRef.current.value;
    if(name === '') return;
    
    setItems(items => {
      let newItems = items.splice(0,0);
    
      for(let i = 0; i < items.length; i++) {
        if(items[i].name === name) {
          newItems.splice(i,1);
          return newItems;
        }
      }
    });
  }

  return (
    <>
      <Header />

  {/* Input Section*/}
  <input type="text" ref={textFieldRef}/>
  <button onClick={handleAddItem}>Add Item</button>
  <button onClick={handleClear}>Clear</button>
  <button onClick={handleRemoveItem}>Remove Item</button>

      <Inventory items={items} />

    </>
  );
}

export default App;
