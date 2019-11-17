export const dynamicSort = (property, type) => {
  let sortOrder = 1;
  if (property[0] === "-") {
    sortOrder = -1;
    property = property.substr(1);
  }
  return function(a, b) {
    let result;
    if (type === "desc") {
      result =
        a[property] > b[property] ? -1 : a[property] > b[property] ? 1 : 0;
    } else if (type === "asc") {
      result =
        a[property] < b[property] ? -1 : a[property] > b[property] ? 1 : 0;
    }
    return result * sortOrder;
  };
};

export const capitalize = s => {
  if (typeof s !== "string") return "";
  return s.charAt(0).toUpperCase() + s.slice(1);
};
