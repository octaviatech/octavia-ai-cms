import { octaviaSdk } from "../../utils/octavia";

export default defineEventHandler(async () => {
  return await octaviaSdk.statistics();
});

