import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, InertiaLink, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const { characters } = usePage().props;
    const { data } = characters;

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Character
                </h2>
            }
        >
            <Head title="Character" />

            <div className="py-12">
                <InertiaLink
                    href={route("character.create")}
                    className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
                >
                    Ajouter un personnage
                </InertiaLink>
                <table className="flex flex-col m-2.5 bg-white table-auto border-collapse border border-slate-500">
                    <thead className="bg-slate-50 dark:bg-slate-700">
                        <tr>
                            <th className="px-6 py-4 slate-900 dark:text-slate-200">#</th>
                            <th className="px-6 py-4 slate-900 dark:text-slate-200">Name</th>
                            <th className="px-6 py-4 slate-900 dark:text-slate-200">Manga</th>
                        </tr>
                    </thead>
                    <tbody>

                    {data.map(({ id, name, manga }) => {
                        return (
                            <tr
                                key={id}
                            >
                                <td className="px-6 py-4">{id}</td>
                                <td className="px-6 py-4">
                                        <InertiaLink
                                        href={route("character.edit", id)}
                                        className="flex items-center  focus:text-indigo-700 focus:outline-none"
                                    >
                                        {name}
                                    </InertiaLink>
                                </td>
                                <td className="px-6 py-4">
                                        <InertiaLink
                                        href={route("manga.edit", manga.id)}
                                        className="flex items-center  focus:text-indigo-700 focus:outline-none"
                                    >
                                        {manga.title}
                                    </InertiaLink>
                                </td>


                            </tr>
                        );
                    })}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
}
