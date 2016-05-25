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

function pluralize(time, label) {
    if (time === 1) {
        return time + label
    }

    return time + label + 's';
}