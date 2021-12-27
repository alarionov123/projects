export default function pick (data, param) {
  const result = {};
  if (param.length === 0) return result;
  const entries = Object.entries(data);
  for (const item of param) {
    for (const [key, value] of entries) {
      if (key === item) {
        result[item] = value;
      }
    }
  }
  return result;
}
