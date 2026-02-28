import { NextResponse } from "next/server";
import { octaviaServerClient } from "@/src/lib/octaviaServerClient";

export async function POST(
  req: Request,
  { params }: { params: { id: string } },
) {
  try {
    const body = await req.json();
    const values = body || {};
    const language = typeof body?.language === "string" ? body.language : "en";
    return NextResponse.json(
      await octaviaServerClient.submitForm(params.id, values, language),
    );
  } catch (e) {
    return NextResponse.json(
      { error: (e as Error).message },
      { status: 500 },
    );
  }
}

