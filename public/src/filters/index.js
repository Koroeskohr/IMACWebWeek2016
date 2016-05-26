export function fromNow (time) {
  const between = (Date.now() - Date.parse(time))/100;
  if (between < 3600) {
    return pluralize(~~(between / 60), ' minute')
  } else if (between < 86400) {
    return pluralize(~~(between / 3600), ' heure')
  } else {
    return pluralize(~~(between / 86400), ' jour')
  }
}

export function truncate(text, length, clamp) {
  clamp = clamp || '...';
  var node = document.createElement('div');
  node.innerHTML = text;
  var content = node.textContent;
  return content.length > length ? content.slice(0, length) + clamp : content;
};


function pluralize(time, label) {
    if (time === 1) {
        return time + label
    }

    return time + label + 's';
}