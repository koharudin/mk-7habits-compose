"use client";

import api from "@/utils/axios";
import Link from "next/link";
import { useEffect, useState } from "react";
export default function Page() {
    const [list, setList] = useState()
    const onLoad = async function () {
        const res = await api.get("/public/quiz")
        setList(res?.data?.data)
    }
    useEffect(() => {
        onLoad();
    }, [])
    return <>Daftar Quiz
        <table>
            <thead>
                <tr>
                    <th>Quiz Name</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                {list && list.map(function (r) {
                    return <tr><td>{r.name}</td><td><Link href={r.slug}>Detail</Link><Link href={r.slug}>Coba</Link></td></tr>
                })}</tbody></table>
    </>
}