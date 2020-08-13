import React from "react";
import Item from "./Item";

export default function Inventory({ items }) {
  return (
    <>
      <div> {items.length} items in inventory:</div>
      <ul>
        {items.map((item) => {
          return (
            <Item
              key={item.id}
              id={item.id}
              name={item.name}
              explosive={item.explosive}
            />
          );
        })}
      </ul>
    </>
  );
}
