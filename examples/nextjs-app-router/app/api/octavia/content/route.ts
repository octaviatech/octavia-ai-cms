import { NextResponse } from "next/server";
import { octaviaServerClient } from "@/src/lib/octaviaServerClient";
export async function GET() {
  try {
    return NextResponse.json(await octaviaServerClient.list());
  } catch (e) {
    return NextResponse.json({ error: (e as Error).message }, { status: 500 });
  }
}
export async function POST(req: Request) {
  try {
    const body = await req.json();
    return NextResponse.json(await octaviaServerClient.create(body));
  } catch (e) {
    return NextResponse.json({ error: (e as Error).message }, { status: 500 });
  }
}
