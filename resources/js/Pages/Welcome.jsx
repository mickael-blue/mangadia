import { Link, Head, usePage } from "@inertiajs/inertia-react";
import CardVS from "@/Components/CardVS";
import { Inertia } from "@inertiajs/inertia";

export default function Welcome(props) {
    const battle = props.battle.data;
    const siteName = props.siteName;

    console.log(battle);

    const voteFor = () => {
        Inertia.post(route('battle.vote', battle))
    }

    return (
        <>
            <Head title="Welcome" />
            <div className="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div className="fixed top-0 right-0 px-6 py-4 sm:block">
                    {props.auth.user ? (
                        <Link
                            href={route("dashboard")}
                            className="text-sm text-gray-700 dark:text-gray-500 underline"
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route("login")}
                                className="text-sm text-gray-700 dark:text-gray-500 underline"
                            >
                                Log in
                            </Link>

                            <Link
                                href={route("register")}
                                className="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                            >
                                Register
                            </Link>
                        </>
                    )}
                </div>

                <div className="flex flex-col item-center">
                    <div>
                        <h1 className="text-5xl text-center my-3 text-slate-100">{siteName} Battle</h1>
                        <p className="text-3xl text-center mb-6 text-slate-200">For you who's the best ?</p>
                    </div>

                    <div className="max-w-6xl flex justify-space-between items-stretch mx-auto sm:px-6 lg:px-8">
                        <CardVS
                            key={battle.character1.id}
                            character={battle.character1}
                            vote={battle.vote_1}
                            handleClick={(e) => {
                                battle.vote_1++
                                voteFor();
                            }}
                        />
                        <div className="flex items-center">
                            <span className="text-slate-900 dark:text-slate-100 text-4xl">
                                VS
                            </span>
                        </div>
                        <CardVS
                            key={battle.character2.id}
                            character={battle.character2}
                            vote={battle.vote_2}
                            handleClick={(e) => {
                                battle.vote_2++
                                voteFor();
                            }}
                        />
                    </div>
                </div>
            </div>
        </>
    );
}
