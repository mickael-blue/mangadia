import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, InertiaLink, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const { mangas } = usePage().props;
    const { data } = mangas;
    console.log(mangas);
    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Manga
                </h2>
            }
        >
            <Head title="Manga" />

            <div className="py-5">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <InertiaLink
                        href={route("manga.create")}
                        className="bg-green-500 text-white font-bold py-2 px-4 rounded-lg"
                    >
                        Ajouter un manga
                    </InertiaLink>
                    <table className="mt-5 rounded-lg bg-white table-auto w-full border-collapse border border-grey-300">
                        <thead className="bg-slate-50 dark:bg-slate-700 rounded-t-lg ">
                            <tr>
                                <th className="border-b px-6 py-4 slate-900 dark:text-slate-200">
                                    #
                                </th>
                                <th className="border-b text-left px-6 py-4 slate-900 dark:text-slate-200">
                                    Title
                                </th>
                                <th className="border-b text-center px-6 py-4 slate-900 dark:text-slate-200">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        {data.map(({ id, title }) => {
                            return (
                            <tr key={id}>
                                <td className="w-1/12 border-b text-center px-6 py-4">{id}</td>
                                <td className="w-9/12 border-b text-left px-6 py-4">{title}</td>
                                <td className="w-2/12 border-b text-center px-6 py-4">
                                    <InertiaLink
                                        href={route(
                                            "manga.edit",
                                            id
                                        )}
                                        className="mx-1 bg-orange-200 font-bold py-2 px-4 rounded-lg  focus:text-indigo-700 focus:outline-none"
                                    >
                                        Edit
                                    </InertiaLink>
                                    <InertiaLink
                                        href={route(
                                            "manga.destroy",
                                            id
                                        )}
                                        className="mx-1 bg-red-200 font-bold py-2 px-4 rounded-lg  focus:text-indigo-700 focus:outline-none"
                                    >
                                        Remove
                                    </InertiaLink>
                                </td>
                            </tr>
                            );
                        })}
                        </tbody>
                    </table>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
