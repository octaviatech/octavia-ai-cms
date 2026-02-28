import { NextResponse } from "next/server";
import { octaviaServerClient } from "@/src/lib/octaviaServerClient";

export async function GET() {
  try {
    return NextResponse.json(await octaviaServerClient.listForms());
  } catch (e) {
    return NextResponse.json(
      { error: (e as Error).message },
      { status: 500 },
    );
  }
}

