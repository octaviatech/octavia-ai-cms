import { NextResponse } from "next/server";
import { octaviaServerClient } from "../../../../../../src/lib/octaviaServerClient";
export async function POST(_: Request, { params }: { params: { id: string } }) {
  try {
    return NextResponse.json(await octaviaServerClient.publish(params.id));
  } catch (e) {
    return NextResponse.json({ error: (e as Error).message }, { status: 500 });
  }
}
