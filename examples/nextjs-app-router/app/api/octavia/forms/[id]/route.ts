import { NextResponse } from "next/server";
import { octaviaServerClient } from "@/src/lib/octaviaServerClient";

export async function GET(
  _req: Request,
  { params }: { params: { id: string } },
) {
  try {
    return NextResponse.json(await octaviaServerClient.getForm(params.id));
  } catch (e) {
    return NextResponse.json(
      { error: (e as Error).message },
      { status: 500 },
    );
  }
}
